import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { baseUrl } from "src/environments/adresseUrl";
import { AuthentificationModel } from "../models/gp.model";

@Injectable({
    providedIn: 'root'
})
export class AuthService {

    constructor(private http: HttpClient) { }

    setToken(token: string): void {
        localStorage.setItem('iTeam-$_gp_v2', token);
    }

    getToken(): string | null {
        return localStorage.getItem('iTeam-$_gp_v2');
    }

    isAuthentifiee(): boolean {
        return this.getToken() !== null;
    }

    authentifier(data: AuthentificationModel): Observable<any> {
        const donnees = new FormData;
        donnees.append('identifiant', data.identifiant);
        donnees.append('password', data.password);
        return this.http.post<FormData>(baseUrl+'/?demande=login/token', donnees);
    }
}
