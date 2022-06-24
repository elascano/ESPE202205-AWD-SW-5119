/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.webservices;

import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;
import ec.edu.espe.controller.ControllerDB;
import ec.edu.espe.model.Hardware;

/**
 * REST Web Service
 *
 * @author HP PC
 */
@Path("hardwareStore")
public class HardwareStoreResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of HardwareStoreResource
     */
    public HardwareStoreResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.HardwareStoreResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Hardware> getJson() {
        //TODO return proper representation object
        ArrayList listHardware = new ArrayList();
        ControllerDB db = new ControllerDB();
        
        listHardware= db.readList();
       
        return listHardware;
    }

    /**
     * PUT method for updating or creating an instance of HardwareStoreResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
