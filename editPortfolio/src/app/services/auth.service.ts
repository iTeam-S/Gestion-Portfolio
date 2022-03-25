import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";


@Injectable({
    providedIn: 'root'
})
export class AuthService {

    constructor(private http: HttpClient) { }


    private token!: string;

    setToken(token: string) {
        this.token = token;
    }

    getToken() {
        return this.token;
    }

    authentifier(donnees: { identifiant: string, password: string }): Observable<any> {
        const data = new FormData();
        data.append('identifiant', donnees.identifiant);
        data.append('password', donnees.password);
        return this.http.post<any>('http://localhost:3000/api-iteams/api.php?demande=login/token-login', data);
    }
}
