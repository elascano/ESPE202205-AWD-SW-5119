/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.cellphones;

import com.mongodb.client.MongoCollection;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import mongo_connection.MongoDB;
import org.bson.Document;

/**
 * REST Web Service
 *
 * @author Martin
 */
@Path("cell_phone")
public class CellPhoneRecourse {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of CellPhoneRecourse
     */
    public CellPhoneRecourse() {
    }

    /**
     * Retrieves representation of an instance of ec.cellphones.CellPhoneRecourse
     * @return an instance of java.lang.String
     */
    @GET
    @Path("{brand}")
    @Produces(MediaType.APPLICATION_JSON)
    public CellPhone getJson(@PathParam("brand")String brand) {
       
        CellPhone cellphone = setCellphone(brand);
        
        MongoCollection <Document> CellPhone = new MongoDB().getDb().getCollection("CellPhones");
        
        try{
            
            Document data= new Document();
            
            data.put("brand",cellphone.getBrand());
            data.put("camara",cellphone.getCamara());
            data.put("color",cellphone.getColor());
            data.put("jack",cellphone.isJack());
            data.put("storage",cellphone.getStorage());
            data.put("system",cellphone.getSystem());
            data.put("weight",cellphone.getWeight());
            data.put("screen",cellphone.getScreen());
            
            CellPhone.insertOne(data);
            
        }catch(Exception err){
            System.out.println("error");
        }
    return cellphone; 
    }
    
    private CellPhone setCellphone(String brand){
    
    CellPhone cellphone = new CellPhone();
        
        cellphone.setBrand(brand);
        cellphone.setCamara(24);
        cellphone.setColor("black piano");
        cellphone.setJack(true);
        cellphone.setStorage("64 gb");
        cellphone.setSystem("Android");
        cellphone.setWeight(170);
        cellphone.setScreen("6.7 inches");
        
    return cellphone;
    }

    /**
     * PUT method for updating or creating an instance of CellPhoneRecourse
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
