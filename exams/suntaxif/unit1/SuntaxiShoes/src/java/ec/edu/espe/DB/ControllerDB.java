/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.DB;
import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import ec.edu.espe.model.Shoes;
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
                "mongodb://edison19:admin@ac-zvfenfd-shard-00-00.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-01.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-02.rbj5oin.mongodb.net:27017/?ssl=true&replicaSet=atlas-jretwc-shard-0&authSource=admin&retryWrites=true&w=majority");
        client = new MongoClient(mongoURI);
        database = client.getDB("AWD5119");
        collection = database.getCollection("Shoes");
    }

    public void add(Shoes shoes) {
        BasicDBObject obj = new BasicDBObject();
        obj.append("id",shoes.getId());
        obj.append("trademark",shoes.getTrademark());
        obj.append("size",shoes.getSize());
        obj.append("type",shoes.getType());
        obj.append("color",shoes.getColor());
        obj.append("price",shoes.getPrice());
        obj.append("description",shoes.getDescription());
                   
        collection.insert(obj);
    }
    
    public ArrayList<Shoes> readList() {
        ArrayList<Shoes> listShoes = new ArrayList();
        Gson gson = new Gson();
        String sShoes = "";
        DBCursor cursor = collection.find();
        while (cursor.hasNext()) {
            sShoes="";
            sShoes += cursor.next();
            Shoes shoes = gson.fromJson(sShoes, Shoes.class);
            listShoes.add(shoes);
        }
        return listShoes;
    }
    
    
}
