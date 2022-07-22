/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.controller;

import com.google.gson.Gson;
import ec.edu.espe.model.Hardware;
import java.util.ArrayList;

/**
 *
 * @author Fernando
 */
public class HardwareController {
    public static void insertDB(Hardware product )
    {
        Gson gson = new Gson();
        String stringProduct = gson.toJson(product);
        ControllerDB.save(stringProduct);
        
    }
    
    public static String modifyDB(int id, Hardware content){
        Gson gson = new Gson();
         if("null".equals(ControllerDB.find(id))){
            return "Product not found: " + id ;
        }
         else{
        content.setIdItem(id);
        String stringProduct = gson.toJson(content);
        ControllerDB.replace(id,stringProduct);
             return "Product updated: " + id;
         }
    }
    
    public static String deleteDB(int id)
    {
        if("null".equals(ControllerDB.find(id))){
            return"Product not found: " + id ;
        }
        else{
            ControllerDB.delete(id);
            return "Product deleted succesfully: " + id;
        }
    }
    
    public static ArrayList<Hardware> showDB()
    {
        Gson gson = new Gson();
        ArrayList<String> productStringList = ControllerDB.findAll();
        ArrayList<Hardware> listHardware = new ArrayList<>();
        Hardware std = new Hardware();
        for(String stringProduct : productStringList){
            std = gson.fromJson(stringProduct,Hardware.class);
            listHardware.add(std);
        }
        return listHardware;
    }
    
    public static Hardware getObjectDB(int id)
    {
        Gson gson = new Gson();
        String stringInstructor = ControllerDB.find(id);  
        Hardware std = gson.fromJson(stringInstructor, Hardware.class);
        return std;
    }
    
}
