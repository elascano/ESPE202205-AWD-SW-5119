/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import ec.edu.espe.university.model.Sport;
import ec.edu.espe.university.utils.Connection;
import java.util.ArrayList;
import java.util.List;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.FormParam;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

/**
 * REST Web Service
 *
 * @author Fernando
 */
@Path("sport")
public class SportResource {

    /**
     * Creates a new instance of SportResource
     */
    public SportResource() {
    }
    
    /*
    @GET 
    @Produces(MediaType.APPLICATION_JSON)
    public Sport getJson() {
        Sport sport = new Sport();
        
        //TODO call to method searche from DB based on the ID
        //instructor = ControllerInstructor.getInstructorById(ID);
        
        sport.setId("1");
        sport.setName("Natacion");
        sport.setType("Nadar");
        sport.setTags("Acuatico");
        sport.setDescription("Habilidad que permite al ser humano desplazarse en el agua");
        sport.setBenefits("Potencia la salud mental y emocional");
        
        return sport;
    }
    */
    
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Sport getInstructor(@PathParam("id") String id) {
        Sport sport = new Sport();
        Connection dataBase = new Connection("Sports");
        sport = dataBase.getSportById(id);
        return sport;
    }

    @POST
    @Path("/insert")
    public Response insertSport(@FormParam("id") String id,
		@FormParam("name") String name,
		@FormParam("type") String type,
                @FormParam("tags") String tags,
                @FormParam("description") String description,
                @FormParam("benefits") String benefits) {
        
        Sport sport = new Sport(id, name, type, tags, description, benefits);
        Connection dataBase = new Connection("Sports");
        dataBase.insertSport(sport);
        
        return Response.status(200) 
                .entity("Sport guardado correctamente!")
                .build();
    }
   
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public List<Sport> getSportSearch() {
        List<Sport> bookModels = new ArrayList<>();
        Connection dataBase = new Connection("Sports");
        bookModels = dataBase.getAllSports();
        return bookModels;
    }
    
    /**
     * PUT method for updating or creating an instance of SportResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
