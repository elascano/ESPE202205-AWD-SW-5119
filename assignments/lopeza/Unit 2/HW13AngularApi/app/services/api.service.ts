import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http"; //libreria
import { Observable } from "rxjs"; //recibe los mensajes

@Injectable()
export class ApiService
{
  constructor(private http:HttpClient){ //llama a los métodos

  }

  getElectronics():Observable<any>{ //recoger los datos de la uri
    return this.http.get("https://fakestoreapi.com/products/category/electronics");
  }
}
