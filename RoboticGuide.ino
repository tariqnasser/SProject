#include "blunoAccessory.h"
blunoAccessory myAccessory;
const int trackingPin1 = 2; //the moving tracking module attach to pin 2
const int trackingPin2 = 4; //the stops tracking module attach to pin 2
int count = 0;//count for offices
int istoppoint = 0;//read from serial port
String sstoppoint = "";
int s;//speed
int trigPin1=11;
int echoPin1=12;
int d=0;//distance
boolean clearb = true;
void setup() {
  Serial.begin(9600);
 // pin 8 and 9 for left motor
  pinMode(9,OUTPUT); // speed 
  pinMode(8,OUTPUT); // Direction
  // pin 6 and 7 for right motor
  pinMode(7,OUTPUT); // direction
  pinMode(6,OUTPUT); // speed
  
  pinMode(trackingPin1, INPUT); // set trackingPin as INPUT
  pinMode(trackingPin2, INPUT); // set trackingPin as INPUT
  
  pinMode(trigPin1, OUTPUT);// triger "waves Sender"
  pinMode(echoPin1, INPUT); // echo "waves Reciever"
}



void loop() {
    sstoppoint = Serial.read() - '0';//read from serial port
    istoppoint = sstoppoint.toInt();//convert to integer
    if(clearb==true)
    {// make sure is stoped at the begining
      digitalWrite(8,LOW);
      analogWrite(9,0);
      digitalWrite(7,HIGH);
      analogWrite(6,0);
      clearb=false;
    }
    while(istoppoint>0){
    //sstoppoint = Serial.read() - '0';
    //istoppoint = sstoppoint.toInt();
    
    sd();
    d=getDistance();
    boolean val1 = digitalRead(trackingPin1); // read the value of moving tracking module
    boolean val2 = digitalRead(trackingPin2); // read the value of stops tracking module
    if(val1 == HIGH) //if it is HiGH
    { //on the line
      //move forward
      digitalWrite(8,LOW);
      analogWrite(9,s);
      digitalWrite(7,HIGH);
      analogWrite(6,s);
      
    }
    else if(val1 == LOW)
    { //out of the line
      //turn right
      digitalWrite(8,LOW);
      analogWrite(9,0);
      digitalWrite(7,HIGH);
      analogWrite(6,s);
      
    }
    if(val2 == LOW)
    {//stops sensor detecting
      count++;
      delay(200);
    }
    if(count == istoppoint)
    { //arive to office
      Serial.write("a");
      count++;
      //stop by the office
      digitalWrite(8,HIGH);
      analogWrite(9,0); 
      digitalWrite(7,LOW);
      analogWrite(6,0);
      delay(5000);
    }
    if(count == 6)
    {//ariving at starting point
      count=0;
      istoppoint = 0;
      sstoppoint = "";
    }
     
  }
  //at starting point
  digitalWrite(8,LOW);
  analogWrite(9,0); 
  digitalWrite(7,HIGH);
  analogWrite(6,0);
  
}

void sd(){// speed determining
  if(d>=30){
    s=180;
    }
  else if(d<30&&d>=15){
    s=100;
    }
  else if(d<15&&d>=5){
    s=50;
    }
  else if(d<5){
    s=0;
    }
    
}
int getDistance(){ // ultraSonic method to calculate distance in cm
  long duration, distance; 
  digitalWrite(trigPin1, HIGH);
  delayMicroseconds(10); 
  digitalWrite(trigPin1, LOW);
  duration = pulseIn(echoPin1, HIGH);
  distance = duration/58.2;
  return distance;
}


  
  
