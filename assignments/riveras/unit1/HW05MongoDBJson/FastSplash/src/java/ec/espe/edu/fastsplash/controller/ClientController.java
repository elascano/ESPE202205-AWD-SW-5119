/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.espe.edu.fastsplash.controller;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.MongoClient;
import ec.espe.edu.fastsplash.model.Client;
import utils.DBManager;

/**
 *
 * @author Christian Novoa
 */
public class ClientController {
    public boolean addClient(Client client) {
        DBManager dbmanager = new DBManager();
        MongoClient mongo = dbmanager.connect();
        if(mongo != null){
            DB dataBase = mongo.getDB("FastSplash");
            DBCollection collection = dataBase.getCollection("Client");
            
            BasicDBObject document = new BasicDBObject();
            document.put("firstName", client.getFirstName());
            document.put("lastName", client.getLastName());
            document.put("ci", client.getCi());
            document.put("email", client.getEmail());
            document.put("bornDate", client.getBornDate());
            
            collection.insert(document);
            return true;
        } else {
            return false;
        }
    }

    public ClientController() {
    }
    
}
