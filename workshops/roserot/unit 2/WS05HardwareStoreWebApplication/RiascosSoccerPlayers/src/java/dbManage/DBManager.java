/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package dbManage;
import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.hardwareStore.Items;
import java.util.ArrayList;
import org.bson.Document;
import soccer.SoccerPlayer;
import org.bson.conversions.Bson;

/**
 *
 * @author G401
 */
public class DBManager {
    MongoDatabase baseDatos;
    //DBCollection collection;
    BasicDBObject document = new BasicDBObject();
    MongoCollection<Document> collection;
    MongoClient mongo;
    String nameCollection;

    Gson gson = new Gson();

    public DBManager(String nameCollection) {
        try {
            this.nameCollection = nameCollection;
            String data="mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test";
            MongoClientURI uri=new MongoClientURI(data);
            mongo = new MongoClient(uri);
            baseDatos = mongo.getDatabase("hardwareStore");
            collection = baseDatos.getCollection(nameCollection);
            System.out.println("conection to database sucessfully");
        } catch (Exception e) {
            System.out.println("no ingresa");
        }
        
    }
    
    public void putHardware(int idItem, Items item){
        Bson query = new BasicDBObject("idItem", new BasicDBObject("$regex", idItem));
        Document doc = new Document();
        doc.append("idItem", item.getIdItem());
        doc.append("name", item.getName());
        doc.append("itemBrand",item.getItemBrand());
        doc.append("description",item.getDescription());
        doc.append("price",item.getPrice());
        doc.append("inStock",item.getInStock());
        collection.replaceOne(query, doc);
    }
    
    public void insert(SoccerPlayer player) {
        Document doc = new Document();
        doc.append("id", player.getId());
        doc.append("name", player.getName());
        doc.append("lastName",player.getLastName());
        doc.append("nickName", player.getNickName());
        doc.append("position",player.getPosition());
        doc.append("numPlayer", player.getNumPlayer());
        doc.append("soccerTeam",player.getSoccerTeam());
        doc.append("nationality", player.getNationality());
        collection.insertOne(doc);   
        mongo.close();
    }
    
    public SoccerPlayer getPlayers(int idSerch){
        ArrayList <SoccerPlayer> players=new ArrayList<>();
        MongoCursor<Document> resultDocument = collection.find().iterator();
        SoccerPlayer player=new SoccerPlayer();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            int id=Integer.valueOf(gson.toJson(theObj.get("id")).replace("\"", ""));
            if(idSerch==id){
                String name=gson.toJson(theObj.get("name")).replace("\"", "");
                String lastName=gson.toJson(theObj.get("lastName")).replace("\"", "");
                String nickName=gson.toJson(theObj.get("nickName")).replace("\"", "");
                String position=gson.toJson(theObj.get("position")).replace("\"", "");
                int numPlayer=Integer.valueOf(gson.toJson(theObj.get("numPlayer")).replace("\"", ""));
                String soccerTeam=gson.toJson(theObj.get("soccerTeam")).replace("\"", "");
                String nationality=gson.toJson(theObj.get("nationality")).replace("\"", ""); 
                player=new SoccerPlayer(id,name,lastName,nickName,position,numPlayer,soccerTeam,nationality);
            }           
        }        
        return player;
    }
    
}
