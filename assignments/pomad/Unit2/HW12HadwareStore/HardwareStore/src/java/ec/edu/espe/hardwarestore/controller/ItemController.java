/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.hardwarestore.controller;

import ec.edu.espe.hardwarestore.model.Item;
import ec.edu.espe.hardwarestore.utils.DBConnection;
import java.util.ArrayList;
import javax.ws.rs.core.Response;

/**
 *
 * @author Dayse Poma
 */
public class ItemController {
    public static DBConnection dataBase;
    
    // Get By ID
    public static Item getByIdProduct(int id){
        Item item = new Item();
        DBConnection dataBasePerson = new DBConnection();
        if(dataBase.retrieveId(id)){
            try{
                item = dataBasePerson.retrieve(id);
            }catch(Exception e){
                System.out.println("Unable to get");
            }
        }
        System.out.println("Error, the document was not found");
        return item;
    }
    
    // Get List
    public static ArrayList<Item> getAllProduct(){
        dataBase = new DBConnection();
        ArrayList<Item> people;
        people = new ArrayList<>();
        if(people.isEmpty()){
            try{
                people = dataBase.retrieveProduct();
            }catch(Exception e){
                System.out.println("Unable to get");
            }
        }
        return(people);
    }
    
    // Update 
    public static Response updateProduct(Item item){
        dataBase = new DBConnection();
        if(dataBase.retrieveId(item.getIdItem())){
            try{
                dataBase.update(item);
                return Response.status(200).entity("Modified document sucessfully").build();
            }catch(Exception e){
                return Response.status(200).entity("Unable to update").build();    
            }
        }
        return Response.status(200).entity("Error, the document was not found").build();
    }
    
    // Update
    public static Response updateProduct(Item newItem, Item oldItem){
        dataBase = new DBConnection();
        if(dataBase.retrieveId(oldItem.getIdItem())){
            try{
                dataBase.update(newItem, oldItem);
                return Response.status(200).entity("Modified document sucessfully").build();
            }catch(Exception e){
                return Response.status(200).entity("Unable to update").build();    
            }
        }
        return Response.status(200).entity("Error, the document was not found").build();
    }
    
    public static Response deleteProduct(int id){
        dataBase = new DBConnection();
        Item item = dataBase.retrieve(id);
        if(dataBase.retrieveId(id)){
            try{
                dataBase.delete(item);
                return Response.status(200).entity("Delete document sucessfully").build();
            }catch(Exception e){
                return Response.status(200).entity("Unable to delete").build();    
            }
        }
        return Response.status(200).entity("Error, the document was not found").build();
    }
    
    // Post
    public static Response postProduct(Item item){
        dataBase = new DBConnection();
        if(!dataBase.retrieveId(item.getIdItem())){
            try{
                dataBase.insert(item);
                return Response.status(200).entity("Document created sucessfully").build();
            }catch(Exception e){
                return Response.status(200).entity("Unable to create").build();    
            }
        }
        return Response.status(200).entity("Error, the document alredy exist").build();
    }
}
