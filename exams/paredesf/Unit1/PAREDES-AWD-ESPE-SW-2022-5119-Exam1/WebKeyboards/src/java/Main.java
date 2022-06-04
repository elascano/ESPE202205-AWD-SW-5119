
import ec.edu.espe.keyboard.Keyboard;
import ec.edu.espe.keyboard.Connection;

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
        
        Keyboard keyboard = new Keyboard("1","Logitech", "250 gr", "Black");
        Connection dataBasekeyboard= new Connection("Keyboard");

       //Buscar por marca
       //System.out.println(dataBasekeyboard.getKeyboardByBrand("Teclados").toString());

    }
    
}
