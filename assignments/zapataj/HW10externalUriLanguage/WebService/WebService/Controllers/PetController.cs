using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace WebService.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class PetController : ControllerBase
    {
        List<Pets> pets = new List<Pets>()
        {
            new Pets(1,"FIDO","dog","3 months",true),
            new Pets(2,"ALEX","cat","1 year",true),
            new Pets(3,"CHESTER","dog","6 moths",true),
            new Pets(4,"LALO","bird","1 month",true),
            new Pets(5,"PELUSA","hamster","11 months",true),
        };
        // GET: api/Pet
        [HttpGet]
        public IEnumerable<Pets> Get()
        {
            return pets;
        }

        // GET: api/Pet/5
        [HttpGet("{id}", Name = "Get")]
        public Pets Get(int id)
        {
            Pets pet = pets.Find(p=>p.ID==id);
            return pet;
        }

        // POST: api/Pet
        [HttpPost]
        public List<Pets> Post([FromBody] Pets pet)
        {
            pets.Add(pet);
            return pets;
        }

        // PUT: api/Pet/5
        [HttpPut("{id}")]
        public List<Pets> Put(int id, [FromBody] Pets pet)
        {
            Pets petToUpdate = pets.Find(p => p.ID == id);
            int index = pets.IndexOf(petToUpdate);
    
            pets[index].Name = pet.Name;
            pets[index].Type = pet.Type;
            pets[index].Age = pet.Age;
            pets[index].Vaccinated = pet.Vaccinated;

            return pets;
        }

        // DELETE: api/ApiWithActions/5
        [HttpDelete("{id}")]
        public List<Pets> Delete(int id)
        {
            Pets pet = pets.Find(p => p.ID== id);
            pets.Remove(pet);
            return pets;
        }
    }
}
