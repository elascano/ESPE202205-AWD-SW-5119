/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.webservices;

import com.google.gson.Gson;
import ec.edu.espe.controller.ControllerDB;
import ec.edu.espe.model.HomeAppliances;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author HP PC
 */
@Path("appliances")
public class AppliancesResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of AppliancesResource
     */
    public AppliancesResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.AppliancesResource
     
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<HomeAppliances> getJson() {
        //TODO return proper representation object
        ArrayList listAppliance = new ArrayList();
        ControllerDB db = new ControllerDB();
        
        listAppliance= db.readList();
       
        return listAppliance;
    }
    
    @GET
    @Path("{idAppliance}")
    @Produces(MediaType.APPLICATION_JSON)
    public HomeAppliances getJson(@PathParam("idAppliance") int idAppliance) {
        //TODO return proper representation object
        Gson gson = new Gson();
        ControllerDB db = new ControllerDB();
        
        String sAppliance = db.search(idAppliance);
        HomeAppliances appliance = gson.fromJson(sAppliance, HomeAppliances.class);

        return appliance;
    }
    
    @POST
    @Produces (MediaType.APPLICATION_JSON)
    @Consumes (MediaType.APPLICATION_JSON)
    public ArrayList<HomeAppliances> addJson(HomeAppliances appliance) {
        
        ArrayList listAppliance = new ArrayList();
        ControllerDB db = new ControllerDB();
        
        db.add(appliance);
        listAppliance= db.readList();
      
        return listAppliance;
    }
    
    @DELETE
    @Path("{idAppliance}")
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<HomeAppliances> deleteJson(@PathParam("idAppliance") int idAppliance) {
        //TODO return proper representation object
        ArrayList listAppliance = new ArrayList();
        ControllerDB db = new ControllerDB();
        
        db.delete(idAppliance);
        listAppliance= db.readList();
        

        return listAppliance;
    }
    
    /**
     * PUT method for updating or creating an instance of AppliancesResource
     * @param id
     * @param appliance
     
     * @return 
     */
    @PUT
    @Path("{id}")
   // @Produces(MediaType.APPLICATION_JSON)
    @Consumes(MediaType.APPLICATION_JSON)
    public String putJson(@PathParam("id") int id,HomeAppliances appliance) {
         
        ControllerDB db = new ControllerDB();
        String aux;
        
        if (appliance.getId()==id){
            db.update(id,appliance);
            aux="Successful";
        } else{
            aux="Error";
        }
        
        return aux;
    }
    
}
