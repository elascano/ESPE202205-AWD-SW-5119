/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package Games;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author SEBAS
 */
@Path("Games")
public class GamesResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of GamesResource
     */
    public GamesResource() {
    }

    /**
     * Retrieves representation of an instance of Games.GamesResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
      String games = 
             "[{\"name\":\"Clash Royale\",\"year\":2016,\"size\":2 GB,\"players\":\"1 player\",\"pegi info\":\"6+\"},"
              + "{\"name\":\"GTA V\",\"year\":2013,\"size\":100 GB,\"players\":\"1 player\",\"pegi info\":\"18+\"}"
              + "{\"name\":\"Fornite\",\"year\":2017,\"size\":31 GB,\"players\":\"1 player\",\"pegi info\":\"12+,\"}"
              + "{\"name\":\"Elden Ring\",\"year\":2022,\"size\":45.76 GB,\"players\":\"1 player\",\"pegi info\":\"16+\"}"
              + "{\"name\":\"Rocket League\",\"year\":2015,\"size\":2 GB,\"players\":\"1-4 players\",\"pegi info\":\"3+\"}]";
       return games;
    }

    /**
     * PUT method for updating or creating an instance of GamesResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
