/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.hardwarestore.controller;

import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.hardwarestore.model.Item;
import org.bson.Document;

/**
 *
 * @author yulia
 */
public class DBManager {

    MongoDatabase baseDatos;
    //DBCollection collection;
    BasicDBObject document = new BasicDBObject();
    MongoCollection<Document> collection;
    MongoClient mongo;
    String nameCollection;

    Gson gson = new Gson();

    public DBManager() {
        try {
            String data;
            data = "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test";
            MongoClientURI uri;
            uri = new MongoClientURI(data);
            mongo = new MongoClient(uri);
            baseDatos = mongo.getDatabase("hardwareStore");
            collection = baseDatos.getCollection("items");
            System.out.println("Conection to database sucessfully");

        } catch (Exception e) {
            System.out.println("Cannnot conect with database");

        }

    }

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
}
