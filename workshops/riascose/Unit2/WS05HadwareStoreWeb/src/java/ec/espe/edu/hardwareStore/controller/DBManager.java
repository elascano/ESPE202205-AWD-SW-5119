/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package ec.espe.edu.hardwareStore.controller;
import com.mongodb.BasicDBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import org.bson.Document;

/**
 *
 * @author G401
 */
public class DBManager {
    private MongoDatabase baseDatos;
    private BasicDBObject document = new BasicDBObject();
    private MongoCollection<Document> collection;
    private MongoClient mongo;
    private String nameCollection;
    public DBManager(String nameDataBase,String nameCollection,String uriDB) {
        try {
            this.nameCollection = nameCollection;
            MongoClientURI uri=new MongoClientURI(uriDB);
            mongo = new MongoClient(uri);
            baseDatos = mongo.getDatabase(nameDataBase);
            collection = baseDatos.getCollection(nameCollection);
            System.out.println("DataBase conection sucessfuled");
        } catch (Exception e) {
            System.out.println("DataBase conection failed");
        }
    }   

    public MongoDatabase getBaseDatos() {
        return baseDatos;
    }

    public void setBaseDatos(MongoDatabase baseDatos) {
        this.baseDatos = baseDatos;
    }

    public BasicDBObject getDocument() {
        return document;
    }

    public void setDocument(BasicDBObject document) {
        this.document = document;
    }

    public MongoCollection<Document> getCollection() {
        return collection;
    }

    public void setCollection(MongoCollection<Document> collection) {
        this.collection = collection;
    }

    public MongoClient getMongo() {
        return mongo;
    }

    public void setMongo(MongoClient mongo) {
        this.mongo = mongo;
    }

    public String getNameCollection() {
        return nameCollection;
    }

    public void setNameCollection(String nameCollection) {
        this.nameCollection = nameCollection;
    }
    
}