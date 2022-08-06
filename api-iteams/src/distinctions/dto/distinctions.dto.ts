import { ApiProperty } from "@nestjs/swagger";

export class DistinctionsCreateDto {
    @ApiProperty()
    organisateur: string;

    @ApiProperty()
    annee: string;

    @ApiProperty()
    type: string;

    @ApiProperty()
    description: string;

    @ApiProperty()
    ordre: number;
}

export class DistinctionsUpdateDto {
    @ApiProperty()
    id: number;

    @ApiProperty()
    organisateur: string;

    @ApiProperty()
    annee: string;

    @ApiProperty()
    type: string;

    @ApiProperty()
    description: string;

    @ApiProperty()
    ordre: number;
}
