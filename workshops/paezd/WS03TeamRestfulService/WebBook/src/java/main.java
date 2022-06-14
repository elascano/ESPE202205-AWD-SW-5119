
import ec.edu.espe.university.book.Book;
import ec.edu.espe.university.book.Connection;

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
        Book book = new Book("1","Platino", "2015", "Jose Mu");
        Connection dataBasebook= new Connection("Book");
        //Insertar libro
       // dataBasebook.insertBook(book);
       //Buscar por nombre
       System.out.println(dataBasebook.getBookByName(" Harry Potter y la piedra filosofal").toString());
       // Imprimir todos 
       //for(int i = 0; i <  dataBasebook.getAllBook().size(); i++) {
       //    System.out.println(dataBasebook.getAllBook().get(i).getId());
       //}
    }
    
}
