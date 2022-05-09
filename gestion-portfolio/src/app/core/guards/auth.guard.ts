import { Injectable } from "@angular/core";
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot } from "@angular/router";
import { AuthService } from "../services/auth.service";

@Injectable({
    providedIn: 'root'
})
export class AuthGuard implements CanActivate { 
    constructor(private auth: AuthService, 
        private router: Router) { }

    canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean {
        if(!this.auth.isAuthentifiee()) {
            localStorage.removeItem('iTeam-$_gp_v2');
            this.router.navigateByUrl('/auth/login');
            return false;
        }
        return this.auth.isAuthentifiee();
    }
}
