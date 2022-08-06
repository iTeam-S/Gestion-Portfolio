import { ApiProperty } from "@nestjs/swagger";

export class UpdateInfoDto {
    @ApiProperty()
    user_github: string;

    @ApiProperty()
    user_github_pic: string;

    @ApiProperty()
    tel1: string;

    @ApiProperty()
    tel2: string;

    @ApiProperty()
    mail: string;

    @ApiProperty()
    facebook: string;

    @ApiProperty()
    linkedin: string;

    @ApiProperty()
    cv: string;

    @ApiProperty()
    adresse: string;

    @ApiProperty()
    description: string;

    @ApiProperty()
    fonction: string;

    @ApiProperty()
    pdc: string;

    @ApiProperty()
    dark: boolean;

    @ApiProperty()
    role: "admin" | "user";
}

export class UpdatePasswordDto {
    @ApiProperty()
    lastPassword: string;

    @ApiProperty()
    newPassword: string;
}
