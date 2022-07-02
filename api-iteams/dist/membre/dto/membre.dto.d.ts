export declare class UpdateInfoDto {
    user_github: string;
    user_github_pic: string;
    tel1: string;
    tel2: string;
    mail: string;
    facebook: string;
    linkedin: string;
    cv: string;
    adresse: string;
    description: string;
    fonction: string;
    pdc: string;
    dark: boolean;
    role: "admin" | "user";
}
export declare class UpdatePasswordDto {
    lastPassword: string;
    newPassword: string;
}
