import { ApiProperty } from "@nestjs/swagger";

export class ExperiencesCreateDto {
    @ApiProperty()
    nom: string;

    @ApiProperty()
    annee: string;

    @ApiProperty()
    type: string;

    @ApiProperty()
    description: string;
}

export class ExperiencesUpdateDto {
    @ApiProperty()
    id: number;

    @ApiProperty()
    nom: string;

    @ApiProperty()
    annee: string;

    @ApiProperty()
    type: string;

    @ApiProperty()
    description: string;
}
