/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import com.google.gson.Gson;
import ec.edu.record.model.ControllerDB;
import ec.edu.record.model.Vynil;
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
 * @author Sebastian
 */
@Path("vynil")
public class VynilResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of VynilResource
     */
    public VynilResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.VynilResource
     * @param idVynil
     * @return an instance of ec.edu.movie.model.Vynil
     */
    @GET
    @Path("{idVynil}")
    @Produces(MediaType.APPLICATION_JSON)
    public Vynil getJson(@PathParam("idVynil") int idVynil) {
        //TODO return proper representation object
        Gson gson = new Gson();
       ControllerDB db = new ControllerDB();
       
       String vynil_record_db=db.search(idVynil);
       Vynil vynil_record_data = gson.fromJson(vynil_record_db, Vynil.class);        
        
        return vynil_record_data;
    }

    /**
     * PUT method for updating or creating an instance of VynilResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Vynil content) {
    }
}
