/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.hardwarestore.utils;

import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.hardwarestore.model.Item;
import java.util.ArrayList;
import org.bson.Document;
/**
 *
 * @author Dayse Poma
 */
public class DBConnection {
     MongoDatabase baseDatos;
    BasicDBObject document = new BasicDBObject();
    MongoCollection<Document> collection;
    MongoClient mongo;
    String nameCollection;
    Gson gson = new Gson();

    public DBConnection () {
        String nameCollection = "item";
        try {
            this.nameCollection = nameCollection;
            String data;
            //data = "mongodb+srv://dnpoma:12345@webuniversity.po9hy.mongodb.net/test";
            data = "mongodb://dnpoma:12345@webuniversity-shard-00-00.po9hy.mongodb.net:27017,webuniversity-shard-00-01.po9hy.mongodb.net:27017,webuniversity-shard-00-02.po9hy.mongodb.net:27017/?ssl=true&replicaSet=atlas-cx7fk5-shard-0&authSource=admin&retryWrites=true&w=majority";
            MongoClientURI uri;
            uri = new MongoClientURI(data);
            mongo = new MongoClient(uri);
            baseDatos = mongo.getDatabase("university_managment");
            collection = baseDatos.getCollection(nameCollection);
            System.out.println("conection to database sucessfully");
            
        } catch (Exception e) {
            System.out.println("Error to database conection");

        }
        
    }
    
    // Insert Product
    public void insert(Item product) {
        Document doc = new Document();
        doc.append("idItem", product.getIdItem());
        doc.append("name", product.getName());
        doc.append("itemBrand", product.getItemBrand());
        doc.append("description", product.getDescription());
        doc.append("price", product.getPrice());
        doc.append("inStock", product.getInStock());
        collection.insertOne(doc);
        mongo.close();
    }
    
    // Get Product by ID
    public Item retrieve(int id) {
        Item item;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        int idItem;
        String name;
        String itemBrand;
        String description;
        double price;
        int inStock;
        Item itemRetrieved = null;
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            idItem = Integer.parseInt(gson.toJson(theObj.get("idItem")));
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            itemBrand = gson.toJson(theObj.get("itemBrand")).replace("\"", "");
            description = gson.toJson(theObj.get("description")).replace("\"", "");
            price = Double.valueOf(gson.toJson(theObj.get("price")));
            inStock = Integer.valueOf(gson.toJson(theObj.get("inStock")));
            item = new Item(idItem, name, itemBrand, description, price, inStock);
            if (id == item.getIdItem()) {
                itemRetrieved = item;
            }
        }
        return itemRetrieved;
    }
    
    // Get Producto by ID
    public Boolean retrieveId(int id) {
        Item item;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        int idItem;
        String name;
        String itemBrand;
        String description;
        double price;
        int inStock;
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            idItem = Integer.parseInt(gson.toJson(theObj.get("idItem")));
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            itemBrand = gson.toJson(theObj.get("itemBrand")).replace("\"", "");
            description = gson.toJson(theObj.get("description")).replace("\"", "");
            price = Double.valueOf(gson.toJson(theObj.get("price")));
            inStock = Integer.valueOf(gson.toJson(theObj.get("inStock")));
            item = new Item(idItem, name, itemBrand, description, price, inStock);
            if (id == item.getIdItem()) {
                return true;
            }
        }
        return false;
    }
     
    // Get all Products
    public ArrayList<Item> retrieveProduct(){
        ArrayList<Item> productList = new ArrayList<>();
        Item item;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        int idItem;
        String name;
        String itemBrand;
        String description;
        double price;
        int inStock;
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            idItem = Integer.parseInt(gson.toJson(theObj.get("idItem")));
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            itemBrand = gson.toJson(theObj.get("itemBrand")).replace("\"", "");
            description = gson.toJson(theObj.get("description")).replace("\"", "");
            price = Double.valueOf(gson.toJson(theObj.get("price")));
            inStock = Integer.valueOf(gson.toJson(theObj.get("inStock")));
            item = new Item(idItem, name, itemBrand, description, price, inStock);
            productList.add(item);
        }
        return productList;
    }
    
    
    // Generate Document
    public Document generateDocument(Item item) {
        Document admin;
        admin = new Document("idItem", item.getIdItem());
        admin.append("name", item.getName());
        admin.append("itemBrand", item.getItemBrand());
        admin.append("description", item.getDescription());
        admin.append("price", item.getPrice());
        admin.append("inStock", item.getInStock());
        return admin;
    }
    
    // Delete Product by ID
    public void deleteById(int id){
        Item item = retrieve(id);
        Document findDocument = generateDocument(item);
        collection.findOneAndDelete(findDocument);
    } 
    
    // Delete Product 
    public void delete(Item item){
        Document findDocument = generateDocument(item);
        collection.findOneAndDelete(findDocument);
    }     
    
    // Update Product
    public void update(Item itemNew){
        Item oldItem = retrieve(itemNew.getIdItem());
        Document findDocument = generateDocument(oldItem);
        Document updateDocument = generateDocument(itemNew);
        Document updateDoc = new Document("$set",updateDocument);
        collection.findOneAndUpdate(findDocument, updateDoc);    
    }
    
    
    // Update Product
    public void update(Item itemNew, Item oldItem){
        Document findDocument = generateDocument(oldItem);
        Document updateDocument = generateDocument(itemNew);
        Document updateDoc = new Document("$set",updateDocument);
        collection.findOneAndUpdate(findDocument, updateDoc);   
    }
    
}
