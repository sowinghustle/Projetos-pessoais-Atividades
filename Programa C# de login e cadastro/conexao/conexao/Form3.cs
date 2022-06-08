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

    public partial class Form3 : Form
    {
        string cnsql = ""; // criando a permissão para poder conectar com o banco de dados
        public Form3(string cn)
        {
            cnsql = cn;
            InitializeComponent();
        }

        public static class Criptografia
        {
            // Calcula MD5 saida de uma determinada string passada como parametro
            // <parametro name="Senha">String contendo a senha que deve ser criptografada para MD5 Hash</param>
            // retorna string com 32 caracteres com a senha criptografada
            public static string MD5(string senha)
            {
                try
                {
                    System.Security.Cryptography.MD5 md5 = System.Security.Cryptography.MD5.Create();
                    byte[] inputBytes = System.Text.Encoding.ASCII.GetBytes(senha);
                    byte[] hash = md5.ComputeHash(inputBytes);//calcula a saída!
                    System.Text.StringBuilder sb = new System.Text.StringBuilder();
                    for (int i = 0; i < hash.Length; i++)
                    {
                        sb.Append(hash[i].ToString("X2"));
                    }
                    return sb.ToString(); // Retorna senha criptografada 
                }
                catch (Exception)
                {
                    return null; // Caso encontre erro retorna nulo
                }
            }
        }

        //criando a função de inserir
        private void inserir()
        {
            string sql = "insert into usuarios (nome,login,senha) values (@nome,@login,@senha)";
            //enviando uma instrução em sql para a variavel com nome de sql



            MySqlConnection conexao = new MySqlConnection(cnsql);
            MySqlCommand comando = new MySqlCommand(sql, conexao);
            comando.Parameters.Add("@nome", MySqlDbType.VarChar).Value = textBox2.Text;
            comando.Parameters.Add("@login", MySqlDbType.VarChar).Value = textBox3.Text;
            comando.Parameters.Add("@senha", MySqlDbType.VarChar).Value = Criptografia.MD5(textBox4.Text);



            conexao.Open();//abrindo conexão com o banco




            int result = comando.ExecuteNonQuery();
            //criando uma variavel do tipo inteiro que vai verificar se o banco existe,
            //se existe a tabela
            //se existe os campos e se os campos são do especificados



            if (result > 0)
            {
                MessageBox.Show("Dados inseridos com sucesso!");



                //chamando a função do CLICK do botão limpar
                button3_Click(null, null);



                consultar();//CHAMANDO A FUNÇÃO CONSULTAR dentro da função INSERIR
            }
            else
            {
                MessageBox.Show("Erro!");
            }
        }

        //função alterar
        private void alterar()
        {
            string sql = "update usuarios set nome=@nome,senha=@senha,login=@login where codigo= '" + textBox1.Text + "'";
            //enviando uma instrução em sql para a variavel com nome de sql



            MySqlConnection conexao = new MySqlConnection(cnsql);
            MySqlCommand comando = new MySqlCommand(sql, conexao);
            comando.Parameters.Add("@nome", MySqlDbType.VarChar).Value = textBox2.Text;
            comando.Parameters.Add("@login", MySqlDbType.VarChar).Value = textBox3.Text;
            comando.Parameters.Add("@senha", MySqlDbType.VarChar).Value = textBox4.Text;



            conexao.Open();//abrindo conexão com o banco




            int result = comando.ExecuteNonQuery();
            //criando uma variavel do tipo inteiro que vai verificar se o banco existe,
            //se existe a tabela
            //se existe os campos e se os campos são do especificados



            if (result > 0)
            {
                MessageBox.Show(result + " Registro alterado com sucesso!");



                //chamando a função do CLICK do botão limpar
                button3_Click(null, null);



                consultar();//CHAMANDO A FUNÇÃO CONSULTAR dentro da função INSERIR
            }
            else
            {
                MessageBox.Show("Erro!");
            }
        }

        //função CONSULTAR 
        private void consultar()
        {
            dataGridView1.Rows.Clear();//limpando os dados do grid
            string sql = "select * from usuarios ORDER BY CODIGO";//enviando uma instrução em sql para o banco
            MySqlConnection conexao = new MySqlConnection(cnsql);//enviando o caminho onde está alocado o banco
            MySqlCommand comando = new MySqlCommand(sql, conexao);//enviando o caminho e a instrução em sql para o  banco
            conexao.Open();//abrindo conexão



            MySqlDataReader leia = comando.ExecuteReader();//enviando uma variavel que irá realizar uma leitura dos dados



            if (leia.HasRows)//encontrou alguma coisa?
            {
                while (leia.Read())//enquanto o leia estiver encontrando dados ele vai exibir as informações no grid, registro por registro
                {
                    dataGridView1.Rows.Add(Convert.ToString(leia["codigo"]), Convert.ToString(leia["nome"]),
                        Convert.ToString(leia["login"]), Convert.ToString(leia["senha"]));
                }
            }
            else
            {
                MessageBox.Show("Nenhum Registro Encontrado!");
            }
            conexao.Close();
        }

        private void button1_Click(object sender, EventArgs e)

        {
            if (textBox2.Text == "" || textBox3.Text == "" || textBox4.Text == "")
            {
                MessageBox.Show("Preencha todos os campos");
            }
            else
                if (textBox1.Text != "")
            {
                alterar(); //chamando a função alterar
            }
            else
            {
                inserir(); //chamando a função salvar
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            textBox1.Clear();
            textBox2.Clear();
            textBox3.Clear();
            textBox4.Clear();
            dataGridView1.Rows.Clear();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            consultar();
        }

        private void dataGridView1_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            textBox1.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[0].Value);
            textBox2.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[1].Value);
            textBox3.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[2].Value);
            textBox4.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[3].Value);
        }

        //função excluir
        private void excluir()
        {
            string sql = "delete from usuarios where codigo= '" + textBox1.Text + "'";
            //enviando uma instrução em sql para a variavel com nome de sql



            MySqlConnection conexao = new MySqlConnection(cnsql);
            MySqlCommand comando = new MySqlCommand(sql, conexao);

            conexao.Open();//abrindo conexão com o banco

            int result = comando.ExecuteNonQuery();
            //criando uma variavel do tipo inteiro que vai verificar se o banco existe,
            //se existe a tabela
            //se existe os campos e se os campos são do especificados

            if (result > 0)
            {
                MessageBox.Show(result + " Registro excluido com sucesso!");



                //chamando a função do CLICK do botão limpar
                button3_Click(null, null);



                consultar();//CHAMANDO A FUNÇÃO CONSULTAR dentro da função INSERIR
            }
            else
            {
                MessageBox.Show("Erro!");
            }
        }


        private void button4_Click(object sender, EventArgs e)
        {
            DialogResult EXCLUIR = MessageBox.Show("Deseja Realmente Excluir o Registro? Essa Operação é IRREVERSÍVEL?", "EXCLUIR", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
            if (EXCLUIR == DialogResult.Yes)
            {
                excluir();
            }


        }

        //função verifica cadastro igual
        private void verificacadastroigual()
        {
            string sql = "select * from usuarios where login=@login";//envniando uma instrução em sql para o banco
            MySqlConnection conexao = new MySqlConnection(cnsql);//enviando o caminho onde está alocado o banco
            MySqlCommand comando = new MySqlCommand(sql, conexao);//enviando o caminho e a instrução em sql para o  banco
            comando.Parameters.Add("@login", MySqlDbType.VarChar).Value = textBox3.Text;



            conexao.Open();//abrindo conexão



            MySqlDataReader leia = comando.ExecuteReader();//enviando uma variavel que irá realizar uma leitura dos dados



            if (leia.HasRows)//encontrou alguma coisa?
            {
                MessageBox.Show("Login já existe: " + textBox3.Text + ", Por favor, Verifique o Login", "Ajuda do Sistema", MessageBoxButtons.OK, MessageBoxIcon.Error);
                textBox3.Clear();//limpando
            }




            conexao.Close();
        }



        private void textBox3_Leave(object sender, EventArgs e)
        {
            if (textBox1.Text == "")
            {
                verificacadastroigual();
            }
        }

        private void Form3_Load(object sender, EventArgs e)
        {

        }
    }
}
