/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package ec.espe.edu.hardwareStore.model;

import ec.espe.edu.hardwareStore.controller.ItemController;

/**
 *
 * @author Erick
 */
public class NewMain {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        ItemController item=new ItemController();
        System.out.println(item.getItem(12));
        
    }
    
}
