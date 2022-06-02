/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.watch.model;

import com.mongodb.client.MongoCollection;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;
import org.bson.Document;

/**
 * REST Web Service
 *
 * @author HP
 */
@Path("smartWatch")
public class SmartWatchResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of SmartWatchResource
     */
    public SmartWatchResource() {
    }

    /**
     * Retrieves representation of an instance of ec.edu.watch.model.SmartWatchResource
     * @return an instance of ec.edu.watch.model.SmartWatch
     */
    @GET
    @Path("list")
    @Produces(MediaType.APPLICATION_JSON)

    public ArrayList<SmartWatch> getJson() {
    MongoCollection <Document> persona = new ConnectionDB().getDB().getCollection("SmartWatches");
    for(int i=0;i<putJson().size();i++){    
    try{
        Document data= new Document();
        data.put("IdSmart",putJson().get(i).getIdSmart());
        data.put("size",putJson().get(i).getSize());
        data.put("price",putJson().get(i).getPrice());
        data.put("resistenceWater",putJson().get(i).isResistenceWater());
        data.put("mark",putJson().get(i).getMark());
        data.put("market",putJson().get(i).getMarket());
        data.put("software",putJson().get(i).getSoftware());
        persona.insertOne(data);
       }catch(Exception err){
       }
    }
    return  putJson();       
    
    }

    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public ArrayList<SmartWatch> putJson() {
        ArrayList<SmartWatch> arrayList = new ArrayList<SmartWatch>();
        SmartWatch smartWatch1=new  SmartWatch(1,"big", (float) 12.5, "blue", true, "LG", "GANGA","Android");
        SmartWatch smartWatch2=new  SmartWatch(2,"smart", (float) 102.0, "green", false, "Iphone", "WALMART","IOS");
        SmartWatch smartWatch3=new  SmartWatch(3,"big", (float) 55.99, "black", true, "Samsung", "COMANDATO","Android");
        
     arrayList.add(smartWatch1);
     arrayList.add(smartWatch2);
     arrayList.add(smartWatch3);
        return arrayList;
    }
}
