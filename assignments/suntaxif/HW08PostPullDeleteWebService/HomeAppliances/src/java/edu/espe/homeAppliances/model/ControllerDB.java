/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package edu.espe.homeAppliances.model;
import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import java.util.ArrayList;

/**
 *
 * @author HP PC
 */
public class ControllerDB {

    private MongoClientURI mongoURI;
    private MongoClient client;
    private DB database;
    private DBCollection collection;

    public ControllerDB() {
        mongoURI = new MongoClientURI(
                "mongodb+srv://admin:admin@cluster0.pukdr.mongodb.net/?retryWrites=true&w=majority");
        client = new MongoClient(mongoURI);
        database = client.getDB("web");
        collection = database.getCollection("HW8");
    }

    public void add(HomeAppliances appliance) {
        //DecimalFormat df = new DecimalFormat("#.00");
       // obj.append("Price",df.format(product.getPrice()));
        BasicDBObject obj = new BasicDBObject();
        obj.append("id",appliance.getId());
        obj.append("trademark",appliance.getTrademark());
        obj.append("item",appliance.getItem());
        obj.append("color",appliance.getColor());
        obj.append("price",appliance.getPrice());
           
        collection.insert(obj);
    }
    


    public ArrayList<HomeAppliances> readList() {
        ArrayList<HomeAppliances> listAppliances = new ArrayList();
        Gson gson = new Gson();
        String sAppliance = "";
        DBCursor cursor = collection.find();
        while (cursor.hasNext()) {
            sAppliance="";
            sAppliance += cursor.next();
            HomeAppliances appliance = gson.fromJson(sAppliance, HomeAppliances.class);
            listAppliances.add(appliance);
        }
        return listAppliances;
    }
    
        public String search(int id) {
        String appliance = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("id", id);
        DBCursor cursor = collection.find(busqueda);
        if (cursor.hasNext()) {
            appliance += cursor.next();
        } else {
            appliance = "No existe";
            }
        return appliance;
    }
        
    public void delete(int id){
        BasicDBObject busqueda=new BasicDBObject();
       busqueda.put("id", id);
       DBCursor cursor=collection.find(busqueda);
       while(cursor.hasNext()){
           DBObject item=cursor.next();
           collection.remove(item);
       }
    }
    
    public HomeAppliances update(HomeAppliances appliance){
       BasicDBObject busqueda=new BasicDBObject();
       HomeAppliances newObj=new HomeAppliances();
       busqueda.put("id",appliance.getId());
       DBCursor cursor=collection.find(busqueda);
       if(cursor.hasNext()){
           DBObject cursorBase=cursor.next();
           cursorBase.put("trademark", appliance.getTrademark());
           cursorBase.put("color",appliance.getColor());
           cursorBase.put("price",appliance.getPrice());
           collection.save(cursorBase);  
           newObj=(HomeAppliances) cursorBase;
       }
       return newObj;
    }
    
}
