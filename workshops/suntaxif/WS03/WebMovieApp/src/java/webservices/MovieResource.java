/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import com.google.gson.Gson;
import ec.edu.movie.model.ControllerDB;
import ec.edu.movie.model.Movie;
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
 * @author HP PC
 */
@Path("movie")
public class MovieResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of MovieResource
     */
    public MovieResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.MovieResource
     * @param idMovie
     * @return an instance of ec.edu.movie.model.Movie
     */
    @GET
    @Path("{idMovie}")
    @Produces(MediaType.APPLICATION_JSON)
    public Movie getJson(@PathParam("idMovie") int idMovie) {
        //TODO return proper representation object
        Gson gson = new Gson();
       ControllerDB db = new ControllerDB();
       
       String instruct=db.search(idMovie);
       Movie instructor = gson.fromJson(instruct, Movie.class);
        
        
        return instructor;
    }

    /**
     * PUT method for updating or creating an instance of MovieResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Movie content) {
    }
}
