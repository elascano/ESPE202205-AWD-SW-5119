package ec.edu.watch.model;

import com.mongodb.ConnectionString;
import com.mongodb.MongoClientSettings;
import com.mongodb.client.MongoClient;
import com.mongodb.client.MongoClients;
import com.mongodb.client.MongoDatabase;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author HP
 */
public class ConnectionDB {
    
    
ConnectionString connectionString = new ConnectionString("mongodb://edison19:admin@ac-zvfenfd-shard-00-00.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-01.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-02.rbj5oin.mongodb.net:27017/?ssl=true&replicaSet=atlas-jretwc-shard-0&authSource=admin&retryWrites=true&w=majority");
MongoClientSettings settings = MongoClientSettings.builder()
        .applyConnectionString(connectionString)
        .build();
MongoClient mongoClient = MongoClients.create(settings);
MongoDatabase database = mongoClient.getDatabase("AWD5119");

public MongoDatabase getDB()
{
    return database;
}
}
