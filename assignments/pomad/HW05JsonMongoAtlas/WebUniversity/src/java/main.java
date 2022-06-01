
import ec.edu.espe.university.model.Instructor;
import ec.edu.espe.university.utils.Connection;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */

/**
 *
 * @author Fernando
 */
public class main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
       Instructor instructor = new Instructor();
       instructor.setId(5);
       instructor.setName("Juan");
       instructor.setSalary(800);
       instructor.setTC(false);
       Connection conection = new Connection("instructor");
//       conection.insertInstructor(instructor);
       
    }
    
}
