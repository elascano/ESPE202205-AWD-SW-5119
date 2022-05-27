/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.aplication.model;
import com.mongodb.ConnectionString;
import com.mongodb.DB;
import com.mongodb.MongoClientSettings;

import com.mongodb.client.MongoClient;
import com.mongodb.client.MongoClients;
import com.mongodb.client.MongoDatabase;


/**
 *
 * @author ediso
 */
public class Conexion {
    ConnectionString connectionString = new ConnectionString("mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/?retryWrites=true&w=majority");
        MongoClientSettings settings = MongoClientSettings.builder()
        .applyConnectionString(connectionString)
        .build();
    MongoClient mongoClient = MongoClients.create(settings);
    MongoDatabase database = mongoClient.getDatabase("university");
    
}
