using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
//colocar isso para trabalhar com o MySql
using MySql.Data;
using MySql.Data.MySqlClient;



namespace conexao
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }

        String cnsql = "SERVER=localhost;DATABASE=escola;UID=root;PASSWORD='';SSL MODE = NONE";

        //criando a função de acesso ao sistema
        private void acesso()
        {
            string sql = "select * from usuarios where login=@LOGIN";
            MySqlConnection conexao = new MySqlConnection(cnsql);//enviando o caminho onde está alocado o banco
            MySqlCommand comando = new MySqlCommand(sql, conexao);//enviando o caminho e a instrução em sql para o  banco
            comando.Parameters.Add("@LOGIN", MySqlDbType.VarChar).Value = textBox1.Text;
            conexao.Open();//abrindo conexão
            MySqlDataReader leia = comando.ExecuteReader();
            if (leia.Read()) //se achou o login no banco
            {
                if (Convert.ToString(leia["senha"]) == textBox2.Text)
                {
                    Form4 form4 = new Form4(cnsql);
                    MessageBox.Show("Bem Vindo ao Sistema " + Convert.ToString(leia["nome"]), "Sistema Inicial", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    this.Visible = false;
                    form4.Show();
                }
                else
                {
                    MessageBox.Show("Dados Inválidos!", "Ajuda do Sistema", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    textBox1.Text = "";
                    textBox2.Text = "";
                }
            }
            else
            {
                MessageBox.Show("Usuário não encontrado!", "Ajuda do Sistema", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }

        }

        //botão de aesso
        private void button1_Click(object sender, EventArgs e)
        {
            if (textBox1.Text == "") //onde vamos informar os dados de LOGIN
            {
                MessageBox.Show("informe o LOGIN!", "Ajuda do Sistema", MessageBoxButtons.OK, MessageBoxIcon.Error);
                textBox1.Focus();
            }
            else
              if (textBox2.Text == "") //onde vamos informar os dados de SENHA
            {
                MessageBox.Show("Informe a SENHA DE ACESSO!", "Ajuda do Sistema", MessageBoxButtons.OK, MessageBoxIcon.Error);
                textBox2.Focus();
            }
            else
            {
                acesso();
            }
        }
    }
}
