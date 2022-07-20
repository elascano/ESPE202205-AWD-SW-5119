import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http"; //libreria
import { Observable } from "rxjs"; //recibe los mensajes

@Injectable()
export class freeApiService
{
  constructor(private http:HttpClient){ //llama a los métodos

  }

  getcomments():Observable<any>{ //recoger los datos del uri
    return this.http.get("https://jsonplaceholder.typicode.com/posts/1/comments");
  }
}
