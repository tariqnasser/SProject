using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using System.Speech.Synthesis;
using System.IO.Ports;

namespace RoboticGuide
{
    public partial class Form1 : Form
    {
        SpeechSynthesizer ss = new SpeechSynthesizer();
        int ID = 0;
        int OfficeNumber = 0;
        string Dname = "";
        MySqlConnection conn = new MySqlConnection("Server = localhost; port=3306; Database = senior project; username=root;Password=;");
        public Form1()
        {
            ss.SelectVoiceByHints(VoiceGender.Female);
            InitializeComponent();
            list_load();
        }


        void list_load()
        {
            comboBox1.Items.Clear();
            button1.Hide();
            button2.Hide();
            MySqlCommand com = conn.CreateCommand();
            com.CommandText = "select * from staff";
            try
            {
                conn.Open();
                MySqlDataReader reader = com.ExecuteReader();
                
                //IDs = new int[reader.FieldCount];
                //names = new string[reader.RecordsAffected];

                int i = 0;
            while (reader.Read()) {

                    comboBox1.Items.Add(reader["Sname"].ToString());
                i++;
                }
            
            

            conn.Close();
            }
            catch (MySql.Data.MySqlClient.MySqlException) { MessageBox.Show("Connection Error"); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            ss.SpeakAsync("this is Doctor "+Dname+" schedule");
            Schedule sch = new Schedule(ID);
            sch.Show();
            this.Hide();
        }
        

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {//Take The Index Of the selected Name and use it to get the doctor id
            int selectedIndex = comboBox1.SelectedIndex;
            button1.Show();
            button2.Show();
            MySqlCommand com = conn.CreateCommand();
            com.CommandText = "select * from staff";
            try { 
            conn.Open();
            MySqlDataReader reader = com.ExecuteReader();
            int i = 1;
            
            while (reader.Read())
            {
                if (selectedIndex + 1 == i)
                {
                    ID = int.Parse(reader["SID"].ToString());
                    OfficeNumber = int.Parse(reader["SOffice"].ToString());
                    Dname = reader["Sname"].ToString();
                    break;
                }
                i++;
                
            }
            conn.Close();
            }
            catch (MySql.Data.MySqlClient.MySqlException) { MessageBox.Show("Connection Error"); }
            
        }

        private void comboBox1_DropDown(object sender, EventArgs e)
        {

            comboBox1.Items.Clear();

            MySqlCommand com = conn.CreateCommand();
            com.CommandText = "select * from staff";
            //try
            //{
            try { 
            conn.Open();
            MySqlDataReader reader = com.ExecuteReader();

            //IDs = new int[reader.FieldCount];
            //names = new string[reader.RecordsAffected];

            int i = 0;
            while (reader.Read())
            {

                comboBox1.Items.Add(reader["Sname"].ToString());
                i++;
            }
            conn.Close();
            }
            catch (MySql.Data.MySqlClient.MySqlException) { MessageBox.Show("Connection Error"); }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            //serialPort1.Open();
            //serialPort1.Write("s");
            ss.SpeakAsync("you have selected Doctor "+Dname+" office, please follow me");
        }
    }
}
       


