
import ec.edu.espe.university.model.Sport;
import ec.edu.espe.university.utils.Connection;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */

/**
 *
 * @author Fernando
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Sport sport = new Sport();
        
        //sport.setId("1");
        //sport.setName("Natacion");
        //sport.setType("Nadar");
        //sport.setTags("Acuatico");
        //sport.setDescription("Habilidad que permite al ser humano desplazarse en el agua");
        //sport.setBenefits("Potencia la salud mental y emocional");
        Connection conection = new Connection("Sports");
        
        /// conection.insertSport(sport);
        
        for(int i = 0; i <  conection.getAllSports().size(); i++) {
           System.out.println(conection.getAllSports().get(i).getId());
       }
        

    }
    
}
