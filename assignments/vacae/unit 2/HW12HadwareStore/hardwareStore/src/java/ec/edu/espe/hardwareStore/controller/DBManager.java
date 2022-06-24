/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.hardwareStore.controller;

import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import ec.edu.espe.hardwareStore.model.HardwareStore;
import java.util.ArrayList;
import org.bson.Document;

/**
 *
 * @author Andrés López
 */
public class DBManager {

    private MongoClientURI mongoURI;
    private MongoClient client;
    private DB database;
    private DBCollection collection;
    private BasicDBObject document = new BasicDBObject();

    public DBManager() {

    }

    public void connection(String user, String password, String databaseName, String collectionName) {
        String URI = "mongodb+srv://" + user + ":" + password + "@clusterawd.rbj5oin.mongodb.net/" + databaseName + "?retryWrites=true&w=majority";
        mongoURI = new MongoClientURI(URI);
        client = new MongoClient(mongoURI);
        database = client.getDB(databaseName);
        collection = database.getCollection(collectionName);
    }

    public ArrayList<HardwareStore> getAll() {
        ArrayList<HardwareStore> hardwareStoreArray = new ArrayList();
        Gson gson = new Gson();
        String hardwareStoreString = "";
        DBCursor cursor = collection.find();
        while (cursor.hasNext()) {
            hardwareStoreString = "";
            hardwareStoreString += cursor.next();
            HardwareStore hardwareStore = gson.fromJson(hardwareStoreString, HardwareStore.class);
            hardwareStoreArray.add(hardwareStore);
        }
        return hardwareStoreArray;
    }

    public String findOne(int id) {
        String hardwareStoreString = "";
        BasicDBObject object = new BasicDBObject();
        object.put("idItem", id);
        object.remove("_id");
        DBCursor cursor = collection.find(object);

        if (cursor.hasNext()) {
            hardwareStoreString += cursor.next();
        }

        return hardwareStoreString;
    }

    public void create(HardwareStore hardwareStore) {
        document.append("idItem", hardwareStore.getIdItem());
        document.append("name", hardwareStore.getName());
        document.append("itemBrand", hardwareStore.getItemBrand());
        document.append("description", hardwareStore.getDescription());
        document.append("price", hardwareStore.getPrice());
        document.append("inStock", hardwareStore.getInStock());

        collection.insert(document);
    }

    public HardwareStore update(HardwareStore hardwareStore, int idItem) {
        HardwareStore hardwareStoreNew = new HardwareStore();
        BasicDBObject findTestItemQuery = new BasicDBObject();
        findTestItemQuery.put("idItem", idItem);
        DBCursor cursor = collection.find(findTestItemQuery);

        if (cursor.hasNext()) {
            DBObject testCodeItem = cursor.next();

            testCodeItem.put("name", hardwareStore.getName());
            testCodeItem.put("itemBrand", hardwareStore.getItemBrand());
            testCodeItem.put("description", hardwareStore.getDescription());
            testCodeItem.put("price", hardwareStore.getPrice());
            testCodeItem.put("inStock", hardwareStore.getInStock());
            collection.save(testCodeItem);
        }

        return hardwareStoreNew;
    }

    public void delete(int id) {
        BasicDBObject object = new BasicDBObject();
        object.put("idItem", id);
        DBCursor cursor = collection.find(object);
        while (cursor.hasNext()) {
            DBObject item = cursor.next();
            collection.remove(item);
        }
    }

}
