
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
//       instructor.setId(44);
//       instructor.setName("Juana");
//       instructor.setSalary(450);
//       instructor.setTC(true);
       Connection conection = new Connection("instructor");
//       conection.insertInstructor(instructor);

       for(int i = 0; i <  conection.getAllIstructor().size(); i++) {
          System.out.println(conection.getAllIstructor().get(i).toString());
      }
        conection.generateInstructorDocument(conection.getInstructorById(44));
        conection.deleteInstructor(instructor);
    }
    
}