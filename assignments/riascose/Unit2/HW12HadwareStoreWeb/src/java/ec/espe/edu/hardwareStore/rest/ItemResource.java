/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.espe.edu.hardwareStore.rest;

import com.google.gson.Gson;
import ec.espe.edu.hardwareStore.controller.ItemController;
import ec.espe.edu.hardwareStore.model.Item;
import java.util.ArrayList;
import java.util.Iterator;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import org.bson.Document;

/**
 * REST Web Service
 *
 * @author Erick
 */
@Path("item")
public class ItemResource {

    @Context
    private UriInfo context;
    private ItemController itemC=new ItemController();

    /**
     * Creates a new instance of ItemResource
     */
    public ItemResource() {
    }

    /**
     * Retrieves representation of an instance of ec.espe.edu.firstapi.rest.ItemResource
     * @return an instance of ec.espe.edu.firstapi.model.item
     */
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Item getJson(@PathParam("id") int id) {
        Gson gson = new Gson();    
        Document theObj = itemC.getItem(id);
        int idItem=Integer.valueOf(gson.toJson(theObj.get("idItem")).replace("\"", ""));
        String name=gson.toJson(theObj.get("name")).replace("\"", "");
        String itemBrand=gson.toJson(theObj.get("itemBrand")).replace("\"", "");
        String description=gson.toJson(theObj.get("description")).replace("\"", "");
        double price=Double.valueOf(gson.toJson(theObj.get("price")).replace("\"", ""));
        int inStock=Integer.valueOf(gson.toJson(theObj.get("inStock")).replace("\"", ""));
        Item item=new Item(idItem,name,itemBrand,description,price,inStock);
        return item;
    }
    
    @GET
    @Path("all")
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Item> getJson() {
                
        ArrayList<Item> items= new ArrayList();
        Iterator it=itemC.getItem().iterator();
        while(it.hasNext()){
            Gson gson = new Gson();
            Document theObj = (Document) it.next();
            int idItem=Integer.valueOf(gson.toJson(theObj.get("idItem")).replace("\"", ""));
            String name=gson.toJson(theObj.get("name")).replace("\"", "");
            String itemBrand=gson.toJson(theObj.get("itemBrand")).replace("\"", "");
            String description=gson.toJson(theObj.get("description")).replace("\"", "");
            double price=Double.valueOf(gson.toJson(theObj.get("price")).replace("\"", ""));
            int inStock=Integer.valueOf(gson.toJson(theObj.get("inStock")).replace("\"", ""));
            Item item=new Item(idItem,name,itemBrand,description,price,inStock);
            items.add(item);
        }        
        return items;
    }
    
    @POST
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public void postJson(Item content) {
        
        itemC.postItem(content);
    }
    
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Item content) {
        itemC.putItem(content);
    }    
    
    @DELETE
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public void deleteJson(@PathParam("id") int id) {
        itemC.deleteItem(id);
    }
}
