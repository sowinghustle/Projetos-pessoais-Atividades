using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace conexao
{
    public class relaluno: List<aluno> { } //aqui está a lista
    public class aluno //aqui está o objeto
    {
        int codigo = 0;
        string nome = "";
        string cpf = "";
        string rg = "";

        public string Nome { get => nome; set => nome = value; }
        public int Codigo { get => codigo; set => codigo = value; }
        public string Cpf { get => cpf; set => cpf = value; }
        public string Rg { get => rg; set => rg = value; }
    }
}
