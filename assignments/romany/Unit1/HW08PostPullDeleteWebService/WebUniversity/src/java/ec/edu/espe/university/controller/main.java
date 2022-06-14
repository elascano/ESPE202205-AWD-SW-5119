/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.controller;

import ec.edu.espe.university.model.Instructor;

/**
 *
 * @author yulia
 */
public class main {
    public static void main(String args []){
        DBManager db =  new DBManager("University");
        
        Instructor instructor = db.retrieve(1);
        System.out.println(instructor.getName());        
        db.deletePatient(instructor);
    }
    
}
