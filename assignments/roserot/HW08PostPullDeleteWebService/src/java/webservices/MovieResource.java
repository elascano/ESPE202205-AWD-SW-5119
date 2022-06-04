/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author usuario
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
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        //String student = "{\"name\":\"Truman Show\",\"year\":\" N/A\"}";
        String movie = "[{\n" +
"            \"id\": 1,\n" +
"            \"title\": \"Beetlejuice\",\n" +
"            \"year\": \"1988\",\n" +
"            \"runtime\": \"92\",\n" +
"            \"genres\": [\n" +
"                \"Comedy\",\n" +
"                \"Fantasy\"\n" +
"            ],\n" +
"            \"director\": \"Tim Burton\",\n" +
"            \"actors\": \"Alec Baldwin, Geena Davis, Annie McEnroe, Maurice Page\",\n" +
"            \"plot\": \"A couple of recently deceased ghosts contract the services of a \\\"bio-exorcist\\\" in order to remove the obnoxious new owners of their house.\",\n" +
"            \"posterUrl\": \"https://images-na.ssl-images-amazon.com/images/M/MV5BMTUwODE3MDE0MV5BMl5BanBnXkFtZTgwNTk1MjI4MzE@._V1_SX300.jpg\"\n" +
"        },\n" +
"        {\n" +
"            \"id\": 2,\n" +
"            \"title\": \"The Cotton Club\",\n" +
"            \"year\": \"1984\",\n" +
"            \"runtime\": \"127\",\n" +
"            \"genres\": [\n" +
"                \"Crime\",\n" +
"                \"Drama\",\n" +
"                \"Music\"\n" +
"            ],\n" +
"            \"director\": \"Francis Ford Coppola\",\n" +
"            \"actors\": \"Richard Gere, Gregory Hines, Diane Lane, Lonette McKee\",\n" +
"            \"plot\": \"The Cotton Club was a famous night club in Harlem. The story follows the people that visited the club, those that ran it, and is peppered with the Jazz music that made it so famous.\",\n" +
"            \"posterUrl\": \"https://images-na.ssl-images-amazon.com/images/M/MV5BMTU5ODAyNzA4OV5BMl5BanBnXkFtZTcwNzYwNTIzNA@@._V1_SX300.jpg\"\n" +
"        },\n" +
"        {\n" +
"            \"id\": 3,\n" +
"            \"title\": \"The Shawshank Redemption\",\n" +
"            \"year\": \"1994\",\n" +
"            \"runtime\": \"142\",\n" +
"            \"genres\": [\n" +
"                \"Crime\",\n" +
"                \"Drama\"\n" +
"            ],\n" +
"            \"director\": \"Frank Darabont\",\n" +
"            \"actors\": \"Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler\",\n" +
"            \"plot\": \"Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.\",\n" +
"            \"posterUrl\": \"https://images-na.ssl-images-amazon.com/images/M/MV5BODU4MjU4NjIwNl5BMl5BanBnXkFtZTgwMDU2MjEyMDE@._V1_SX300.jpg\"\n" +
"        },\n" +
"        {\n" +
"            \"id\": 4,\n" +
"            \"title\": \"Crocodile Dundee\",\n" +
"            \"year\": \"1986\",\n" +
"            \"runtime\": \"97\",\n" +
"            \"genres\": [\n" +
"                \"Adventure\",\n" +
"                \"Comedy\"\n" +
"            ],\n" +
"            \"director\": \"Peter Faiman\",\n" +
"            \"actors\": \"Paul Hogan, Linda Kozlowski, John Meillon, David Gulpilil\",\n" +
"            \"plot\": \"An American reporter goes to the Australian outback to meet an eccentric crocodile poacher and invites him to New York City.\",\n" +
"            \"posterUrl\": \"https://images-na.ssl-images-amazon.com/images/M/MV5BMTg0MTU1MTg4NF5BMl5BanBnXkFtZTgwMDgzNzYxMTE@._V1_SX300.jpg\"\n" +
"        },\n" +
"        {\n" +
"            \"id\": 5,\n" +
"            \"title\": \"Valkyrie\",\n" +
"            \"year\": \"2008\",\n" +
"            \"runtime\": \"121\",\n" +
"            \"genres\": [\n" +
"                \"Drama\",\n" +
"                \"History\",\n" +
"                \"Thriller\"\n" +
"            ],\n" +
"            \"director\": \"Bryan Singer\",\n" +
"            \"actors\": \"Tom Cruise, Kenneth Branagh, Bill Nighy, Tom Wilkinson\",\n" +
"            \"plot\": \"A dramatization of the 20 July assassination and political coup plot by desperate renegade German Army officers against Hitler during World War II.\",\n" +
"            \"posterUrl\": \"http://ia.media-imdb.com/images/M/MV5BMTg3Njc2ODEyN15BMl5BanBnXkFtZTcwNTAwMzc3NA@@._V1_SX300.jpg\"\n" +
"        },\n" +
"        {\n" +
"            \"id\": 6,\n" +
"            \"title\": \"Ratatouille\",\n" +
"            \"year\": \"2007\",\n" +
"            \"runtime\": \"111\",\n" +
"            \"genres\": [\n" +
"                \"Animation\",\n" +
"                \"Comedy\",\n" +
"                \"Family\"\n" +
"            ],\n" +
"            \"director\": \"Brad Bird, Jan Pinkava\",\n" +
"            \"actors\": \"Patton Oswalt, Ian Holm, Lou Romano, Brian Dennehy\",\n" +
"            \"plot\": \"A rat who can cook makes an unusual alliance with a young kitchen worker at a famous restaurant.\",\n" +
"            \"posterUrl\": \"https://images-na.ssl-images-amazon.com/images/M/MV5BMTMzODU0NTkxMF5BMl5BanBnXkFtZTcwMjQ4MzMzMw@@._V1_SX300.jpg\"\n" +
"        },\n" +
"        {\n" +
"            \"id\": 7,\n" +
"            \"title\": \"City of God\",\n" +
"            \"year\": \"2002\",\n" +
"            \"runtime\": \"130\",\n" +
"            \"genres\": [\n" +
"                \"Crime\",\n" +
"                \"Drama\"\n" +
"            ],\n" +
"            \"director\": \"Fernando Meirelles, Kátia Lund\",\n" +
"            \"actors\": \"Alexandre Rodrigues, Leandro Firmino, Phellipe Haagensen, Douglas Silva\",\n" +
"            \"plot\": \"Two boys growing up in a violent neighborhood of Rio de Janeiro take different paths: one becomes a photographer, the other a drug dealer.\",\n" +
"            \"posterUrl\": \"https://images-na.ssl-images-amazon.com/images/M/MV5BMjA4ODQ3ODkzNV5BMl5BanBnXkFtZTYwOTc4NDI3._V1_SX300.jpg\"\n" +
"        },\n" +
"        {\n" +
"            \"id\": 8,\n" +
"            \"title\": \"Memento\",\n" +
"            \"year\": \"2000\",\n" +
"            \"runtime\": \"113\",\n" +
"            \"genres\": [\n" +
"                \"Mystery\",\n" +
"                \"Thriller\"\n" +
"            ],\n" +
"            \"director\": \"Christopher Nolan\",\n" +
"            \"actors\": \"Guy Pearce, Carrie-Anne Moss, Joe Pantoliano, Mark Boone Junior\",\n" +
"            \"plot\": \"A man juggles searching for his wife's murderer and keeping his short-term memory loss from being an obstacle.\",\n" +
"            \"posterUrl\": \"https://images-na.ssl-images-amazon.com/images/M/MV5BNThiYjM3MzktMDg3Yy00ZWQ3LTk3YWEtN2M0YmNmNWEwYTE3XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg\"\n" +
"        },\n" +
"        {\n" +
"            \"id\": 9,\n" +
"            \"title\": \"The Intouchables\",\n" +
"            \"year\": \"2011\",\n" +
"            \"runtime\": \"112\",\n" +
"            \"genres\": [\n" +
"                \"Biography\",\n" +
"                \"Comedy\",\n" +
"                \"Drama\"\n" +
"            ],\n" +
"            \"director\": \"Olivier Nakache, Eric Toledano\",\n" +
"            \"actors\": \"François Cluzet, Omar Sy, Anne Le Ny, Audrey Fleurot\",\n" +
"            \"plot\": \"After he becomes a quadriplegic from a paragliding accident, an aristocrat hires a young man from the projects to be his caregiver.\",\n" +
"            \"posterUrl\": \"http://ia.media-imdb.com/images/M/MV5BMTYxNDA3MDQwNl5BMl5BanBnXkFtZTcwNTU4Mzc1Nw@@._V1_SX300.jpg\"\n" +
"        },\n" +
"        {\n" +
"            \"id\": 10,\n" +
"            \"title\": \"Stardust\",\n" +
"            \"year\": \"2007\",\n" +
"            \"runtime\": \"127\",\n" +
"            \"genres\": [\n" +
"                \"Adventure\",\n" +
"                \"Family\",\n" +
"                \"Fantasy\"\n" +
"            ],\n" +
"            \"director\": \"Matthew Vaughn\",\n" +
"            \"actors\": \"Ian McKellen, Bimbo Hart, Alastair MacIntosh, David Kelly\",\n" +
"            \"plot\": \"In a countryside town bordering on a magical land, a young man makes a promise to his beloved that he'll retrieve a fallen star by venturing into the magical realm.\",\n" +
"            \"posterUrl\": \"https://images-na.ssl-images-amazon.com/images/M/MV5BMjkyMTE1OTYwNF5BMl5BanBnXkFtZTcwMDIxODYzMw@@._V1_SX300.jpg\"\n" +
"        }]";
        return movie; 
    }

    /**
     * PUT method for updating or creating an instance of MovieResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
