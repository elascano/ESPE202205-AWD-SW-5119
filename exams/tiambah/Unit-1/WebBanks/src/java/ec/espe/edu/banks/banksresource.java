/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.espe.edu.banks;

import com.google.gson.Gson;
import ec.espe.edu.ControllerDB.ControllerDB;
import ec.espe.edu.model.Banks;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author Henry
 */
@Path("banks")
public class banksresource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of banksresource
     */
    public banksresource() {
    }

    /**
     * Retrieves representation of an instance of ec.espe.edu.banks.banksresource
     * @return an instance of java.lang.String
     */
    @GET
    @Path("{idBanks}")
    @Produces(MediaType.APPLICATION_JSON)
    public Banks getJson(@PathParam("idBanks") int idBanks) {
        //TODO return proper representation object
        Gson gson = new Gson();
       ControllerDB db = new ControllerDB();
       
       String instruct=db.search(idBanks);
       Banks instructor = gson.fromJson(instruct, Banks.class);
        
        
        return instructor;
    }
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        Gson gson = new Gson();
        ControllerDB db = new ControllerDB();

        String banks = db.read();

        return banks;
    }
   
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
