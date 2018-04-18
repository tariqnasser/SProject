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

namespace RoboticGuide
{
    public partial class Schedule : Form
    {
        int DoctorID;
        public Schedule(int id)
        {
            InitializeComponent();
            DoctorID = id;
        }

        private void Schedule_Load(object sender, EventArgs e)
        {
            MySqlConnection conn = new MySqlConnection("Server = localhost; port = 3306; Database = senior project; username = root; Password =; ");
            MySqlCommand com = conn.CreateCommand();

            com.CommandText = "select * from task where SID = " + DoctorID + "";
            try {
                conn.Open();
                MySqlDataReader reader = com.ExecuteReader();

                DataTable table = new DataTable();
                table.Columns.Add("Task Name");
                table.Columns.Add("Task Room");
                table.Columns.Add("Task Day");
                table.Columns.Add("Task Time");
                table.Columns.Add("Task Duration");
                while (reader.Read()) {
                    table.Rows.Add(new object[] { reader["Tname"], reader["Troom"], reader["Tday"], reader["Ttime"], reader["Tduration"] });
                }
                dataGridView1.DataSource = table;
                conn.Close();
            }
            catch (MySql.Data.MySqlClient.MySqlException) { MessageBox.Show("Connection Error"); }
            MySqlCommand com1 = conn.CreateCommand();
            com1.CommandText = "select * from staff where SID = "+DoctorID+"";
            try {
                conn.Open();
                MySqlDataReader reader1 = com1.ExecuteReader();
                while (reader1.Read()) {
                    label5.Text = reader1["Sname"].ToString();
                    label6.Text = reader1["SOffice"].ToString();
                    label7.Text = reader1["SEmail"].ToString();
                    label8.Text = reader1["MN"].ToString();
                }
                conn.Close();
            } catch (MySql.Data.MySqlClient.MySqlException) { MessageBox.Show("Connection Error"); }
        }

        private void button1_Click(object sender, EventArgs e)
        {
           Form1 ob = new Form1();
           this.Hide();
            ob.Show();
        }
    }
}
