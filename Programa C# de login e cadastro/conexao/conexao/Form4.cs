using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

using MySql.Data;
using MySql.Data.MySqlClient;

namespace conexao
{
    public partial class Form4 : Form
    {
        string cnsql = ""; 
        public Form4(string cn)
        {
            cnsql = cn;
            InitializeComponent();
        }

        private void Form4_Load(object sender, EventArgs e)
        {

        }

        private void sairToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void alunosToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Form1 form1 = new Form1(cnsql);
            form1.ShowDialog();
        }

        private void usuáriosToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Form3 form3 = new Form3(cnsql);
            form3.ShowDialog();
        }
    }
}
