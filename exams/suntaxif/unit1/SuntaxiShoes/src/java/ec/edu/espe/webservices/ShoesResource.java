/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.webservices;

import ec.edu.espe.DB.ControllerDB;
import ec.edu.espe.model.Shoes;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author HP PC
 */
@Path("Shoes")
public class ShoesResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ShoesResource
     */
    public ShoesResource() {
    }

   
    @GET
    @Path("listShoes")
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Shoes> getJson() {
        //TODO return proper representation object
        ArrayList listShoes = new ArrayList();
        ControllerDB db = new ControllerDB();
        
        listShoes= db.readList();
       
        return listShoes;
    }
    
    @POST
    @Path("add")
    @Produces (MediaType.APPLICATION_JSON)
    @Consumes (MediaType.APPLICATION_JSON)
    public ArrayList<Shoes> addJson(Shoes shoes) {
        
        ArrayList listShoes = new ArrayList();
        ControllerDB db = new ControllerDB();
        
        db.add(shoes);
        listShoes= db.readList();
      
        return listShoes;
    }

 
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Shoes content) {
    }
}
