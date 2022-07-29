/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package espe.edu.rest;

import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import ec.espe.edu.model.ConnectionDB;
import org.bson.Document;
import ec.espe.edu.model.Item;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author HP
 */
@Path("Item")
public class ItemResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ItemResource
     */
    public ItemResource() {
    }
ArrayList<Item> item =new ArrayList<Item>();
    /**
     * Retrieves representation of an instance of espe.edu.rest.ItemResource
     * @return an instance of ec.espe.edu.model.Item
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<String> getJson() {
        MongoCollection <Document> persona = new ConnectionDB().obtenerDB().getCollection("items");
        ArrayList<String> stringList = new ArrayList<>();
        ArrayList<Document> items = new ArrayList<>();
        items = persona.find().into(new ArrayList<>());
        for (Document item : items) {
            String itemString = item.toJson();
            stringList.add(itemString);
        }
        return stringList;
    }

    /**
     * PUT method for updating or creating an instance of ItemResource
     * @param content representation for the resource
     */
    @PUT
   @Path("update/{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public ArrayList<String> putJson(@PathParam("id")int id,String newName) {
        //search if id exists
     MongoCollection <Document> persona = new ConnectionDB().obtenerDB().getCollection("items");
    // Create the document to specify find criteria
    Document findDocument = new Document("idItem",newName);

    // Create the document to specify the update
    Document updateDocument = new Document("$set",
        new Document("name", "destornillador"));

    // Find one person and delete
    persona.findOneAndUpdate(findDocument, updateDocument);
        //search based on localId
        return getJson();
}
}
