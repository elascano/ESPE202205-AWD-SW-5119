/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.DELETE;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author ediso
 */
@Path("fotballplayers")
public class FotballplayersResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of FotballplayersResource
     */
    public FotballplayersResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.FotballplayersResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        //TODO return proper representation object
        String fotballPlayers ="{\"name\":\"Federico Valverde\", \"team\":\"Real Madrid CF\", \"birthdate\":\"22/07/1998\", \"age\":23, \"country\":\"Uruguay\", \"position\":\"Mediocentro\", \"priceApprox\": 65.000.000},\n" +
        "{\"name\":\"Ilkay Gündogan\", \"team\":\"Manchester City\", \"birthdate\":\"24/10/1990\", \"age\":31, \"country\":\"Alemania\", \"position\":\"Mediocentro\", \"priceApprox\": 35.000.000},\n"+
        "{\"name\":\"Theo Hernández\", \"team\":\"AC Milan\", \"birthdate\":\"06/10/1997\", \"age\":24, \"country\":\"Francia\", \"position\":\"Lateral Izquierdo\", \"priceApprox\": 48.000.000},\n" +
        "{\"name\":\"Piero Hincapié\", \"team\":\"Bayern Leverkusen\", \"birthdate\":\"09/01/2002\", \"age\":20, \"country\":\"Ecuador\", \"position\":\"Defensa Central\", \"priceApprox\": 17.000.000},";
        return fotballPlayers;

    }

    /**
     * PUT method for updating or creating an instance of FotballplayersResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
