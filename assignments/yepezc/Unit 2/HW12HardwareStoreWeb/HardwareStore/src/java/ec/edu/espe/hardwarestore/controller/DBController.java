/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.hardwarestore.controller;

import com.google.gson.Gson;
import ec.edu.espe.hardwarestore.model.Item;
import ec.edu.espe.hardwarestore.utils.MongoManager;
import java.util.ArrayList;
import javax.ws.rs.core.Response;

/**
 *
 * @author yepec
 */
public class DBController {
    String database = "hardwareStore";
    String collection = "items";
    String uriClass = "mongodb+srv://admin:admin@cluster0.uxgwiwo.mongodb.net/?retryWrites=true&w=majority" ; //  <- uri mia general
    String uriPersonal = "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test";// uri edison
    String idObjectName = "idItem";
    
   public Response save(Item item){
        Gson gson = new Gson();
        boolean saved;
        int id = item.getIdItem();
        String stringItem = gson.toJson(item); 
        String find = MongoManager.find(id,idObjectName, database, collection, uriPersonal);
        if(!"null".equals(find)){
            return Response.status(Response.Status.CONFLICT).entity("ID " + item.getIdItem() + " Already Exists").build();
        }
        saved = MongoManager.save(stringItem, database, collection, uriPersonal);
        if (saved == true){
            return Response.status(Response.Status.OK).entity( "Entity created for ID: " + item.getIdItem()).build();
        }
        return Response.status(Response.Status.INTERNAL_SERVER_ERROR).entity("DB Manager ERROR for ID: " +item.getIdItem()).build();
    }
   
   public Response getAll(){
        Gson gson = new Gson();
        ArrayList<Item> itemList = new ArrayList<>();
        Item item = new Item();
        ArrayList<String> find = MongoManager.findAll(database, collection, uriPersonal);
        if(find == null){
            return Response.status(Response.Status.INTERNAL_SERVER_ERROR).entity("DB Manager ERROR for get ALL ").build();
        }
        for(String stringInstructor : find){
           item= gson.fromJson(stringInstructor,Item.class);
            itemList.add(item);
        }

        if (itemList.isEmpty()){
            return Response.status(Response.Status.NO_CONTENT).entity("No content on DB").build();
        }
        return Response.status(Response.Status.OK).entity(itemList).build();
   }
   
   public Response getById(int id){
        Gson gson = new Gson();
        String find = MongoManager.find(id,idObjectName, database, collection, uriPersonal);
        if("null".equals(find)){
            return Response.status(Response.Status.NOT_FOUND).entity("ID: " + id + " Not Found").build();
        }     
        Item item = gson.fromJson(find, Item.class);
        return Response.status(Response.Status.OK).entity(item).build();
   }
   
   public Response update(int id,Item item){
        String find = MongoManager.find(id,idObjectName, database, collection, uriPersonal);
        Gson gson = new Gson();
        boolean updated;
        if("null".equals(find)){
            return Response.status(Response.Status.NOT_FOUND).entity("ID: " + id + " Not Found").build();
        }
        item.setIdItem(id);
        String stringItem = gson.toJson(item);
        updated = MongoManager.replace(id, idObjectName, stringItem, database, collection, uriPersonal);
        if(updated == false){
            return Response.status(Response.Status.INTERNAL_SERVER_ERROR).entity("DB Manager ERROR for update id:" + id).build();
        }
        return Response.status(Response.Status.OK).entity("Entity updated for ID: " + id ).build();
   }
   public Response delete(int id){
      String find = MongoManager.find(id,idObjectName, database, collection, uriPersonal);
       boolean deleted;
       if("null".equals(find)){
            return Response.status(Response.Status.NOT_FOUND).entity( "Entity not found for ID: " + id ).build();
        }
       deleted = MongoManager.delete(id, idObjectName, database, collection, uriPersonal);
       if(deleted == false){
           return Response.status(Response.Status.INTERNAL_SERVER_ERROR).entity("DB Manager ERROR for delete id:" + id).build();
       }
       return Response.status(Response.Status.OK).entity("Entity deleted for ID: " + id ).build();

   }
}
