import { DistinctionsService } from './distinctions.service';
import { DistinctionsCreateDto, DistinctionsUpdateDto } from './dto';
export declare class DistinctionsController {
    private readonly distinctionsService;
    constructor(distinctionsService: DistinctionsService);
    getDistinctions(req: any): Promise<import("../output").Distinctions[]>;
    createDistinctions(donnees: DistinctionsCreateDto, req: any): Promise<void>;
    updateDistinctions(donnees: DistinctionsUpdateDto, req: any): Promise<void>;
    removeDistinctions(donnees: {
        id: number;
    }): Promise<void>;
}
