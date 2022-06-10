using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebService
{
    public class Pets
    {
        public int ID { get; set; }
        public string Name{ get; set; }
        public string Type { get; set; }
        public string Age { get; set; }
        public bool Vaccinated { get; set; }

        public Pets(int iD, string name, string type, string age, bool vaccinated)
        {
            ID = iD;
            Name = name;
            Type = type;
            Age = age;
            Vaccinated = vaccinated;
        }

        public Pets()
        {
        }
    }
}
