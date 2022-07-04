/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.controller;
import com.google.gson.Gson;
import ec.edu.espe.model.Movie;
import java.util.ArrayList;

/**
 *
 * @author USUARIO
 */
public abstract class MovieController {
    
    
     public static void insertDB(Movie movie)
    {
        Gson gson = new Gson();
        String stringProduct = gson.toJson(movie);
        MongoDbManager.save(stringProduct);
        
    }
    
    public static String modifyDB(int id, Movie content){
        Gson gson = new Gson();
         if("null".equals(MongoDbManager.find(id))){
            return "Product not found with this id: " + id ;
        }
         else{
        content.setIdMovie(id);
        String stringProduct = gson.toJson(content);
        MongoDbManager.replace(id,stringProduct);
             return "Product updated  by this id: " + id;
         }
    }
    
    public static String deleteDB(int id)
    {
        if("null".equals(MongoDbManager.find(id))){
            return"Product not found for ID: " + id ;
        }
        else{
            MongoDbManager.delete(id);
            return "Product deleted succesfully for ID: " + id;
        }
    }
    
    public static ArrayList<Movie> showDB()
    {
        Gson gson = new Gson();
        ArrayList<String> productStringList = MongoDbManager.findAll();
        ArrayList<Movie> productList = new ArrayList<>();
        Movie std = new Movie();
        for(String stringProduct : productStringList){
            std = gson.fromJson(stringProduct,Movie.class);
            productList.add(std);
        }
        return productList;
    }
    
    public static Movie getObjectDB(int id)
    {
        Gson gson = new Gson();
        String stringInstructor = MongoDbManager.find(id);  
        Movie std = gson.fromJson(stringInstructor, Movie.class);
        return std;
    }
    
}
